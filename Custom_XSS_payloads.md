## XSS on form tag, action attribute 😁️

```<form action="javascript:alert()"><input type="submit" value="test"></form>```
craft such payload and click the button, it'll trigger an XSS :)

Since when form tag is submitted, it automatically does *redirect*, which itself causes javascript protocol
to be executed, and alert to pop-up haha.

Hmm, I found out such thing is less-known, but still I didn't invent something new, I rediscovered it, and it's kinda from self-inventions list,
but I post it anyways.

## XSS via image/svg+xml content-type & data: protocol
I don't know if this can be useful haha, but anyways.

```data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg"><script>alert()</script>```
