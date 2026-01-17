## Info
I invented this, but there are yet no real cases like this discovered by me.

Although, it can surely work.


## Steps to pentest
1. Grab any URL where you are logged-in, e.g. .../dashboard
2. Drop in an incognito page
3. Grab the mutated URL, with perhaps some redirect parameter there
4. Drop in sessioned one, but change the redirect to URL, e.g. https://example.com, or you can try with
same https://target-domain@example.com
etc...
But most importantly, if there is such bug, visit the url after Ctrl+U, so like
view-source:https://domain.com/?redirect_uri=https://example.com
And then if you are not redirected that means, the redirect logic is by JS.

And you can perhaps trigger a XSS, with javascript: protocol
