<?php
// keep your existing PHP logic, but output an HTML shell
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lab 1 - XSS</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="logo">X</div>
      <div>
        <h1 class="h1">Lab 1 - XSS</h1>
        <div class="desc">Part of the XSS Labs series</div>
      </div>
    </div>

    <div class="nav">
      <a href="index.php" class="btn secondary">← Back to Labs</a>
    </div>

    <div class="card">
<?php
if (isset($_GET['a'])) {
  $a=$_GET['a'];

  if (strpos($a,'<')!==false || strpos($a, '`')!==false ) {
    die("<h2>Let's say I'm WAF or pure mad user-input sanitizating code block</h2>
    <div class='nav'><a href='index.php' class='btn secondary'>← Back to Labs</a></div>");
  }
  echo "<script>let challange=`Simple challange I guess, ".$a.", no really`</script>";
}
?>
      <h3>Use ?a= in URL to inject payload</h3>
      <h3>To pass the challange just trigger alert() :)</h3>

      <button onclick="showSolution()" class="btn">Show the solution</button>
      <div id="solution" class="solution" aria-live="polite"></div>

      <script>
      /* SPOILER AHEAD */
      let SOLUTION=window.location.origin+window.location.pathname+atob('P2E9JHthbGVydCgpfQ==');
      function showSolution() {
        document.getElementById('solution').textContent = "Solution payload: " + SOLUTION;
      }
      </script>
    </div>

    <div class="footer">Made for testing & learning — keep it legal, guys.</div>
  </div>
</body>
</html>
