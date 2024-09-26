@extends('front.layout.app')

@section('title', 'Cart')

@section('content')
@include('front.layout.hero')

    <style>
       body{
        direction: rtl;
       }
        .container_box_box_box {
            margin-top: 50px;
        }
        .section {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .section h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .section p {
            text-align: justify;
        }
        .section ul {
            list-style-type: none;
            padding: 0;
        }
        .section ul li::before {
            content: "•";
            color: #007bff;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    </style>
</head>
<body>
<div class="container_box_box_box">
    <div class="section">
        <h2>شرح عن المتجر</h2>
        <p>{{ $contents->about_store }}</p>
    </div>
    <div class="section">
        <h2>ميزات المتجر</h2>
        <ul>
            @foreach (explode("\n", $contents->store_features) as $feature)
                <li>{{ $feature }}</li>
            @endforeach
        </ul>
    </div>
    <div class="section">
        <h2>موقع المتجر</h2>
        <p>تفضل بزيارتنا على العنوان التالي:<br>
        العنوان: {{ $contents->store_address }}<br>
        الهاتف: {{ $contents->phone }}<br>
        البريد الإلكتروني: {{ $contents->email }}</p>
    </div>
</div>


@endsection