## Taint Analysis (Reinvention ofc, like this existed but I discovered it for myself, without knowing about it)
So, basically I was thinking if we could track the vulnerability chain, like the vuln flow.

Like, basic such analysis would be 

```Variable definition equaled to user input -> Used in bad sink, e.g. for DOM XSS.```

A bit advanced lookup could be 

 ```Variable definition equaled to user input -> check if var is not re-assigned -> Used in bad sink```

## Demo
To get more practical understanding, I've wrote very basic such analyser code:

```
import re

# Capture variable name, then match it later in same regex
pattern = r"(?:let|var|const)\s+(?P<var>[a-zA-Z_$][a-zA-Z0-9_$]*)\s*=\s*(?:params\.get|URLSearchParams).*?(?:innerHTML|href|location)\s*=\s*(?P=var)"

text = "let redirect = params.get('url'); window.location = redirect;"

match = re.search(pattern, text, re.DOTALL)
if match:
    print("TAINT CHAIN FOUND!")
    print(match.group(0))  # Full match
    print(match.group('var'))  # The variable name
```

## My tooling, for DOM vuln checks, taint-analysis
After I discovered about this, I've wrote jf() in my other repo Bash4hacking, which does lookup with given regex-es
inside all JS-es that are sourced, and in case of finds, it logs: the JS where regex was found (inline or source), page, pattern(you give), and match.

So you are free to try doing taint-analysis with jf.

## Other notes
Of course this could be seen mostly as open-source hacking technique, but well, why not use same technique on DOM vulns, and am sure there will be such bugs :D
