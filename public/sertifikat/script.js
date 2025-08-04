window.addEventListener('load', function() {
    const content = document.getElementById('certificate-content');
    const qrcodeContainer = document.getElementById('qrcode-container');
    const dateName = document.getElementById('date-name');
    const certificate = document.getElementById('certificate');

    content.innerHTML = _content;

    const qrcodeImage = document.createElement('img');
    qrcodeImage.src = 'qrcode.svg';
    qrcodeImage.alt = 'QR Code';
    // qrcodeContainer.appendChild(qrcodeImage);

    dateName.innerHTML = _dateName;

    // window.print();
});
