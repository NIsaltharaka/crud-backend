<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Backend</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .center-container {
      text-align: center;
    }

    .wave-text span {
      display: inline-block;
      animation: wave 1.5s infinite;
    }

    @keyframes wave {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }

    /* Applying incremental delays to each letter */
    .wave-text span:nth-child(1) { animation-delay: 0s; }
    .wave-text span:nth-child(2) { animation-delay: 0.1s; }
    .wave-text span:nth-child(3) { animation-delay: 0.2s; }
    .wave-text span:nth-child(4) { animation-delay: 0.3s; }
    .wave-text span:nth-child(5) { animation-delay: 0.4s; }
    .wave-text span:nth-child(6) { animation-delay: 0.5s; }
    /* Add more as needed based on your text length */
  </style>
</head>
<body>
  <div class="center-container">
    <i class="fa-solid fa-database database-icon"></i>
    <h2 class="wave-text">
      <!-- Wrap each letter in a span for the animation -->
      <span>B</span><span>A</span><span>C</span><span>K</span><span>E</span><span>N</span><span>D</span>
      <span>&nbsp;</span> <!-- Space -->
    </h2>
  </div>
</body>
</html>
