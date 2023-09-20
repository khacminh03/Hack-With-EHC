// Hàm để lấy tham số từ URL
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var id = getParameterByName('id');
var profileElement = document.getElementById('profile');
var nameElement = document.getElementById('name');
var dobElement = document.getElementById('dob');
var sloganElement = document.getElementById('slogan');

if (id === '1') {
    profileElement.querySelector('img').src = 'https://kenh14cdn.com/thumb_w/660/203336854389633024/2022/2/21/photo-1-1645459464516934681884.jpg';
    nameElement.textContent = 'Sena';
    dobElement.textContent = 'Unknown';
    sloganElement.textContent = 'Thằng nào có tiền thì nạp tiền vào donate cho tao ít thì 5 quả trứng nhiều thì một quả tên lửa';
} else if (id === '2') {
    profileElement.querySelector('img').src = 'https://i1.sndcdn.com/artworks-8ZVIqdI2bysFDkSK-SJ1Pyg-t500x500.jpg';
    nameElement.textContent = 'Huấn Hoa Hường';
    dobElement.textContent = 'Unknown';
    sloganElement.textContent = 'Những cái loại không làm mà đòi có ăn thì chỉ có ăn code ăn database';
} else if (id === '0') {
    profileElement.querySelector('img').src = 'https://a1cf74336522e87f135f-2f21ace9a6cf0052456644b80fa06d4f.ssl.cf2.rackcdn.com/images/characters/large/800/Dipper.Gravity-Falls.webp';
    nameElement.textContent = 'Dipper Pines';
    dobElement.textContent = 'Unknown';
    sloganElement.textContent = 'Thách đồng chí có được flag ấy';
} else {
    profileElement.innerHTML = '<p>Không tìm thấy hồ sơ.</p>';
}
