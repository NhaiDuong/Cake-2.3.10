/**
 * Created by Duong Nhai on 3/30/2017.
 */
$.ajax({
    url: '/posts/index',
    cache: false,
    type: 'GET',
    dataType: 'HTML',
    success: function (latest) {
        $('#latest').html(latest);
    }
});