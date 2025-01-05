<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>XAIagg Media Aggregator</title>
</head>

<body <?php if (session()->get('isLoggedIn')): ?>class="w-screen h-[95vh] md:h-[96.5vh]" <?php else: ?>class="w-screen h-screen" <?php endif; ?>>