<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Construction Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 60px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            font-size: 64px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        h1 {
            color: #2d3748;
            font-size: 42px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .subtitle {
            color: #4a5568;
            font-size: 20px;
            margin-bottom: 30px;
            font-weight: 400;
        }

        .welcome-text {
            color: #718096;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .feature-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 15px;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .feature-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .feature-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 14px;
            opacity: 0.9;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 10px;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        @media (max-width: 768px) {
            .container {
                padding: 40px 25px;
            }

            h1 {
                font-size: 32px;
            }

            .subtitle {
                font-size: 18px;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">🏗️</div>
        <h1>Construction Management System</h1>
        <p class="subtitle">Name:{{$employee->name}}</p>

        <p class="welcome-text">
            আমাদের আধুনিক কনস্ট্রাকশন ম্যানেজমেন্ট সিস্টেমে স্বাগতম। এই প্ল্যাটফর্মটি আপনার সকল
            নির্মাণ প্রকল্প সহজে ও কার্যকরভাবে পরিচালনা করতে সাহায্য করবে। প্রজেক্ট ট্র্যাকিং থেকে
            শুরু করে বাজেট ম্যানেজমেন্ট পর্যন্ত সবকিছু এক জায়গায়।
        </p>

        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <div class="feature-title">প্রজেক্ট ট্র্যাকিং</div>
                <div class="feature-desc">রিয়েল-টাইমে প্রজেক্টের অগ্রগতি মনিটর করুন</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <div class="feature-title">বাজেট ম্যানেজমেন্ট</div>
                <div class="feature-desc">খরচ নিয়ন্ত্রণ ও হিসাব সংরক্ষণ</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <div class="feature-title">টিম কোলাবরেশন</div>
                <div class="feature-desc">সকল সদস্যের সাথে সহজ যোগাযোগ</div>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <div class="feature-title">মোবাইল এক্সেস</div>
                <div class="feature-desc">যেকোনো জায়গা থেকে অ্যাক্সেস করুন</div>
            </div>
        </div>

        <div>
            <button class="btn" onclick="alert('লগইন পেজে স্বাগতম!')">লগইন করুন</button>
            <button class="btn btn-secondary" onclick="alert('রেজিস্ট্রেশন শুরু করুন!')">নতুন একাউন্ট</button>
        </div>
    </div>
</body>
</html>
