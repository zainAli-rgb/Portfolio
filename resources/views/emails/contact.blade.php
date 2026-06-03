<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Portfolio Contact</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f2f5;
            padding: 40px 16px;
            color: #1a1a2e;
        }

        .wrapper {
            max-width: 580px;
            margin: 0 auto;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        }

        .header {
            background: #0a0c0f;
            padding: 36px 40px;
            text-align: center;
        }

        .header .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.01em;
        }

        .header .logo span {
            color: #00e5c8;
        }

        .header p {
            color: #7a8499;
            font-size: 0.85rem;
            margin-top: 6px;
        }

        .badge {
            display: inline-block;
            margin-top: 16px;
            background: rgba(0, 229, 200, 0.12);
            border: 1px solid rgba(0, 229, 200, 0.35);
            color: #00e5c8;
            padding: 6px 18px;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .body {
            padding: 40px;
        }

        .body h2 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0a0c0f;
            margin-bottom: 6px;
        }

        .body .subtitle {
            color: #7a8499;
            font-size: 0.875rem;
            margin-bottom: 28px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #aab0c0;
            margin-bottom: 6px;
        }

        .field-value {
            font-size: 0.92rem;
            color: #1a1a2e;
            background: #f7f8fb;
            border: 1px solid #e8eaf0;
            border-radius: 10px;
            padding: 12px 16px;
            line-height: 1.6;
            word-break: break-word;
        }

        .field-value.message-body {
            white-space: pre-wrap;
            min-height: 100px;
        }

        .reply-btn {
            display: block;
            width: 100%;
            background: #00e5c8;
            color: #0a0c0f;
            text-align: center;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 15px;
            border-radius: 999px;
            margin-top: 28px;
            letter-spacing: 0.02em;
        }

        .footer {
            background: #f7f8fb;
            border-top: 1px solid #e8eaf0;
            padding: 24px 40px;
            text-align: center;
        }

        .footer p {
            font-size: 0.78rem;
            color: #aab0c0;
            line-height: 1.6;
        }

        .footer a {
            color: #00e5c8;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="card">

            {{-- Header --}}
            <div class="header">
                <div class="logo"><span>&lt;</span>ZAA<span>/&gt;</span></div>
                <p>zainaliasghar12@gmail.com</p>
                <span class="badge">📬 New Portfolio Message</span>
            </div>

            {{-- Body --}}
            <div class="body">
                <h2>You've received a new message</h2>
                <p class="subtitle">Someone reached out through your portfolio contact form.</p>

                <div class="field">
                    <div class="field-label">From</div>
                    <div class="field-value">{{ $senderName }}</div>
                </div>

                <div class="field">
                    <div class="field-label">Email Address</div>
                    <div class="field-value">{{ $senderEmail }}</div>
                </div>

                <div class="field">
                    <div class="field-label">Subject</div>
                    <div class="field-value">{{ $subject }}</div>
                </div>

                <div class="field">
                    <div class="field-label">Message</div>
                    <div class="field-value message-body">{{ $userMessage }}</div>
                </div>

                <a href="mailto:{{ $senderEmail }}" class="reply-btn">
                    Reply to {{ $senderName }}
                </a>
            </div>

            {{-- Footer --}}
            <div class="footer">
                <p>
                    This email was sent from your portfolio at
                    <a href="#">zainaliasghar.dev</a><br>
                    © {{ date('Y') }} Zain Ali Asghar. All rights reserved.
                </p>
            </div>

        </div>
    </div>
</body>

</html>
