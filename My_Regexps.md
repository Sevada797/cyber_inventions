## Here I'll drop my own writen regex-es

**Grep out paths (from HTML/JS files)**

```
grep -Eo "'/([a-zA-Z0-9_\./\-]+|)((\?)[a-zA-Z_\-]+(=|)([a-zA-Z0-9_%\-]+|)((&)[a-zA-Z_\-]+=([a-zA-Z0-9_%\-]+|)|)|)'"
grep -Eo "\"/([a-zA-Z0-9_\./\-]+|)((\?)[a-zA-Z_\-]+(=|)([a-zA-Z0-9_%\-]+|)((&)[a-zA-Z_\-]+=([a-zA-Z0-9_%\-]+|)|)|)\""
grep -Eo "\`/([a-zA-Z0-9_\./\-]+|)((\?)[a-zA-Z_\-]+(=|)([a-zA-Z0-9_%\-]+|)((&)[a-zA-Z_\-]+=([a-zA-Z0-9_%\-]+|)|)|)\`"
```

More can come, since I kinda enjoy writing regexp haha. (I may implement such helper func in B4 BTW - Bash4hacking repo)
