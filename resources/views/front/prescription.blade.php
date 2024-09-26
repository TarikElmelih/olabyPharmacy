@extends('front.layout.app')

@section('title', 'Cart')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<style>
    body {
        direction: rtl;
        text-align: right;
    }
    .header-text {
        margin-top: 50px;
    }
    .submit-btn {
        margin-bottom: 50px;
    }
</style>

<div class="header-text container">


    <h4 class="mb-4 text-center">اكتب هنا اسم الدواء أو المنتج الذي تريد طلبه من الصيدلية.</h4>
    <form id="whatsappForm" onsubmit="sendToWhatsApp(event)">
        @csrf
        <div class="mb-3">
            <label for="drugName" class="form-label">اسم المنتج</label>
            <input type="text" class="form-control" id="drugName" name="drug_name" required placeholder="حليب اطفال">
        </div>
        <div class="mb-3">
            <label for="drugDescription" class="form-label">وصف الدواء</label>
            <textarea class="form-control" id="drugDescription" name="drug_description" rows="3" required placeholder="مثال: علبة تيمبرا و حليب أطفال نمرة 2"></textarea>
        </div>

        <button type="submit" class="submit-btn btn btn-primary">إرسال الطلب</button>
        
        <h4 class="mb-4 text-center">اطلب وصفتك بشكل مباشر عن طريق الضغط على الزر أدناه</h4>
        
        <button type="button" class="submit-btn btn btn-primary" onclick="sendImage()">إرسال صورة</button>
    </form>
</div>

<script>
    function sendToWhatsApp(event) {
        event.preventDefault();

        const drugName = document.getElementById('drugName').value;
        const drugDescription = document.getElementById('drugDescription').value;

        const message = `طلب راشيتة غير موجودة\n\n` +
            `*اسم الدواء:* ${drugName}\n` +
            `*وصف الدواء:* ${drugDescription}\n\n` +
            `*يرجى إرفاق صورة الدواء في الرسالة*`;

        const whatsappUrl = `https://wa.me/+905537098748?text=${encodeURIComponent(message)}`;

        window.open(whatsappUrl, '_blank');
    }

    function sendImage() {
         const message = `*يرجى إرفاق صورة الدواء في الرسالة`;
        
         
         
         const whatsappUrl = `https://wa.me/+905537098748?text=${encodeURIComponent(message)}`;

        window.open(whatsappUrl, '_blank');
    }
</script>
@endsection
