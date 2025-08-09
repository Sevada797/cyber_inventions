<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lab 2 - XSS</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="logo">X</div>
      <div>
        <h1 class="h1">Lab 2 - XSS</h1>
        <div class="desc">Part of the XSS Labs series</div>
      </div>
    </div>

    <div class="nav">
      <a href="index.php" class="btn secondary">← Back to Labs</a>
    </div>

    <div class="card">
      <h3>Simulating node enviroment</h3>
      <h3>Use ?a= in URL to inject payload</h3>
      <h3>Let's see how smart you can get :3</h3>
      <h3>Ah yes to win trigger alert("!@#$%^&*()+") :DD</h3>

<?php
function simulation_func_node_encodeURIComponent($str) {
    $noEncode = "-_.!~*'()";
    $encoded = rawurlencode($str);
    foreach (str_split($noEncode) as $char) {
        $encoded = str_replace(rawurlencode($char), $char, $encoded);
    }
    return $encoded;
}

if (isset($_GET['a'])) {
  $a=$_GET['a'];
  echo "<script>location='https://youtube.com/?forTrackingLetsSay=".simulation_func_node_encodeURIComponent($a)."'</script>";
}
?>
      <button onclick="showSolution()" class="btn">Show the solution</button>
      <div id="solution" class="solution" aria-live="polite"></div>

      <script>
      /* SPOILER AHEAD */
      let SOLUTION=window.location.origin+window.location.pathname+atob('P2E9YXNkYXNkJTI3LWV2YWwoYWxlcnQoZGVjb2RlVVJJQ29tcG9uZW50KCUyNyFAJTIzJCUyNV4lMjYqKCklMkIlMjcpKSktJTI3');
      function showSolution() {
        document.getElementById('solution').textContent = "Solution payload: " + SOLUTION;
      }
      </script>
    </div>

    <div class="footer">Made for testing & learning — keep it legal, guys.</div>
  </div>
</body>
</html>
