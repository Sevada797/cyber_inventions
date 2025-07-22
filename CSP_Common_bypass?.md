## CSP Bypass, what devs miss.
Hey there, lately during hunting, I was one step away from a crazy XSS, just CSP was a problem, however, I started to poke around,
did 
```curl -I target.com/somendp```
then I noticed that there are no CSP headers, I know that ```curl -I``` sends OPTIONS request.

I thought for a second, what if another method can make CSP go away, I tried, 
```curl -X POST target.com/somendp -v | head -n0```
and BOOM, no CSP headers, I tried same thing on different websites, and some of them had same problem, even well-known platforms.

I am amazed, and this was very cool experience, after I did a great job completing the XSS using POST request via crafted html form haha.
