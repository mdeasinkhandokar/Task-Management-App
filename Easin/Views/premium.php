<?php
require_once 'controller/session.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Account - Easin</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        .premium-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        .plan-card {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin: 1rem 0;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .back-to-dashboard {
            display: inline-block;
            margin-bottom: 1rem;
            color: #2196F3;
            text-decoration: none;
            font-weight: 500;
        }

        .back-to-dashboard:hover {
            text-decoration: underline;
        }
        .plan-card:hover {
            border-color: #4CAF50;
            transform: translateY(-5px);
        }

        .plan-card.selected {
            border-color: #4CAF50;
            background: #f0f9f0;
        }

        .price {
            font-size: 2rem;
            color: #2196F3;
            margin: 1rem 0;
        }

        .features {
            list-style: none;
            padding: 0;
        }

        .features li {
            margin: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
        }

        .features li:before {
            content: '✓';
            color: #4CAF50;
            position: absolute;
            left: 0;
        }

        .purchase-btn {
            background: #2196F3;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .purchase-btn:hover {
            background: #1976D2;
        }

        #payment-status {
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 5px;
            display: none;
        }

        .success {
            background: #E8F5E9;
            color: #2E7D32;
        }

        .error {
            background: #FFEBEE;
            color: #C62828;
        }
    </style>
</head>
<body>
    <div class="premium-container">
        <a href="dashboard.php" class="back-to-dashboard">← Back to Dashboard</a>
        <h1>Upgrade to Premium</h1>
        <div class="plan-card" data-plan="monthly" onclick="selectPlan('monthly')">
            <h2>Monthly Plan</h2>
            <div class="price">$9.99/month</div>
            <ul class="features">
                <li>Unlimited tasks</li>
                <li>Advanced analytics</li>
                <li>Priority support</li>
                <li>Custom categories</li>
            </ul>
        </div>

        <div class="plan-card" data-plan="yearly" onclick="selectPlan('yearly')">
            <h2>Yearly Plan</h2>
            <div class="price">$99.99/year</div>
            <ul class="features">
                <li>All monthly features</li>
                <li>2 months free</li>
                <li>Team collaboration</li>
                <li>API access</li>
            </ul>
        </div>

        <button id="purchase-btn" class="purchase-btn" onclick="processPurchase()">Purchase Now</button>
        <div id="payment-status"></div>
    </div>

    <script>
        let selectedPlan = null;

        function selectPlan(plan) {
            selectedPlan = plan;
            document.querySelectorAll('.plan-card').forEach(card => {
                card.classList.remove('selected');
            });
            document.querySelector(`[data-plan="${plan}"]`).classList.add('selected');
        }

        function processPurchase() {
            if (!selectedPlan) {
                showStatus('Please select a plan first', 'error');
                return;
            }

            const data = {
                plan: selectedPlan,
                action: 'purchase_premium'
            };

            fetch('controller/premium_handler.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showStatus('Purchase successful! Redirecting to dashboard...', 'success');
                    setTimeout(() => {
                        window.location.href = 'dashboard.php';
                    }, 2000);
                } else {
                    showStatus(data.message || 'Purchase failed. Please try again.', 'error');
                }
            })
            .catch(error => {
                showStatus('An error occurred. Please try again.', 'error');
                console.error('Error:', error);
            });
        }

        function showStatus(message, type) {
            const statusDiv = document.getElementById('payment-status');
            statusDiv.textContent = message;
            statusDiv.className = type;
            statusDiv.style.display = 'block';
        }
    </script>
</body>
</html>