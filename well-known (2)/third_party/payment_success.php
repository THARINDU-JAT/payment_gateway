<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - Co-operative Insurance</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --success: #16a34a;
            --background: #f8fafc;
            --card: #ffffff;
            --text: #1e293b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background: var(--background);
            min-height: 100vh;
            display: grid;
            place-items: center;
            color: var(--text);
            padding: 1.5rem;
        }

        .success-container {
            width: 100%;
            max-width: 42rem;
            perspective: 1000px;
        }

        .success-card {
            background: var(--card);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            transform-style: preserve-3d;
            animation: cardEntry 1s ease-out;
        }

        @keyframes cardEntry {
            0% {
                opacity: 0;
                transform: translateY(30px) rotateX(-10deg);
            }
            100% {
                opacity: 1;
                transform: translateY(0) rotateX(0);
            }
        }

        .success-header {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .checkmark-circle {
            width: 96px;
            height: 96px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(145deg, var(--success), #22c55e);
            border-radius: 50%;
            display: grid;
            place-items: center;
            position: relative;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .checkmark-circle i {
            color: white;
            font-size: 2.5rem;
            animation: checkmark 0.8s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        @keyframes checkmark {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .success-title {
            font-size: 2rem;
            color: var(--success);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .transaction-details {
            display: grid;
            gap: 1rem;
            background: #f1f5f9;
            border-radius: 1rem;
            padding: 1.5rem;
            margin: 2rem 0;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            background: white;
            border-radius: 0.75rem;
            transition: transform 0.2s;
        }

        .detail-item:hover {
            transform: translateX(8px);
        }

        .detail-label {
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-value {
            font-family: 'SF Mono', 'Courier New', monospace;
            background: #f8fafc;
            padding: 0.25rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
        }

        .actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.875rem;
            border-radius: 0.75rem;
            border: none;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: var(--primary);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.1);
        }

        @media print {
            .no-print { display: none; }
            .success-card { box-shadow: none; }
            .detail-item:hover { transform: none; }
        }

        @media (max-width: 640px) {
            .actions {
                grid-template-columns: 1fr;
            }
            .success-card {
                padding: 1.5rem;
            }
            .success-title {
                font-size: 1.5rem;
            }
            .detail-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
            .detail-value {
                width: 100%;
                text-align: center;
            }
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            pointer-events: none;
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add meta refresh tag for automatic redirect after 3 seconds -->
    <meta http-equiv="refresh" content="3;url=/index.php">
    <title>Payment Successful - Co-operative Insurance</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* ... (previous styles remain the same) ... */
        
        /* Add a countdown style */
        .redirect-message {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.875rem;
            color: #64748b;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-card">
            <div class="success-header">
                <div class="checkmark-circle">
                    <i class="fas fa-check"></i>
                </div>
                <h1 class="success-title">Payment Successful!</h1>
                <p>Your transaction has been completed securely.</p>
                <p class="redirect-message">Redirecting to homepage in <span id="countdown">3</span> seconds...</p>
            </div>
        </div>
    </div>

    <script>
        //Countdown timer
        let timeLeft = 15;
        const countdownElement = document.getElementById('countdown');
        
        const countdownTimer = setInterval(() => {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
            }
        }, 1000);

        // JavaScript redirect as fallback
        setTimeout(() => {
            window.location.href = '/index.php';
        }, 3000);

        // Confetti animation
        function createConfetti() {
            const colors = ['#60a5fa', '#34d399', '#fbbf24', '#f87171', '#a78bfa'];
            const confettiCount = 150;
            
            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';
                confetti.style.opacity = Math.random();
                confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                
                const animation = confetti.animate([
                    { transform: `translate(0, -10px) rotate(0deg)`, opacity: 1 },
                    { transform: `translate(${Math.random() * 100 - 50}px, ${window.innerHeight}px) rotate(${Math.random() * 360}deg)`, opacity: 0 }
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(.37,0,.63,1)'
                });
                
                animation.onfinish = () => confetti.remove();
                document.body.appendChild(confetti);
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(createConfetti, 500);
        });
    </script>
</body>
</html>