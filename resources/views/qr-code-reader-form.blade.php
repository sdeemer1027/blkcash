<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
{{--
                    <form action="{{ route('qrcode.read') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="qr_image">Upload QR Code Image</label>
                        <input type="file" name="qr_image" id="qr_image" required>
                        <button type="submit">Read QR Code</button>
                    </form>

--}}



<h1>QR Code Reader</h1>
<video id="preview"></video>

<script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
<script type="text/javascript">
    let selectedDeviceId;
    const codeReader = new ZXing.BrowserQRCodeReader();
    codeReader.getVideoInputDevices().then((videoInputDevices) => {
        selectedDeviceId = videoInputDevices[0].deviceId;
        codeReader.decodeFromVideoDevice(selectedDeviceId, 'preview', (result, err) => {
            if (result) {
                console.log(result.text);

                alert("QR Code Content: " + result.text);
                window.location.href = '/payments?id=' + encodeURIComponent(result.text);
            }
            if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err);
            }
        });
    }).catch((err) => {
        console.error(err);
    });
</script>






</div>
</div>
</div>
</div>
</x-app-layout>

