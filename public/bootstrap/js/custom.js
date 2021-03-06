
$(document).ready(function () {
    $('.optional').empty();
});

$('#guest_id').on('change',function (e) {
    console.log(e);
    var identy = e.target.value;
    $.get('guest_id?identy=' + identy, function (data) {
        $('#guest_name').empty();
        $.each(data, function (index, guestObj) {
            $('#guest_name').append('<option value="'+guestObj.id+'">'+guestObj.name+' ('+guestObj.contact_1+')</option>')
        })
    })
})
$('#guest_name').on('change',function (e) {
    console.log(e);
    var identy = e.target.value;
    $.get('guest_name?identy=' + identy, function (data) {
        $('#guest_id').empty();
        $.each(data, function (index, guestObj) {
            $('#guest_id').append('<option value="'+guestObj.id+'">'+guestObj.id+'->'+guestObj.name+'</option>')
        })

    })
})
$('#nationality').on('change',function (e) {
    console.log(e);
    var nationality = e.target.value;
    $.get('nationality?nationality=' + nationality, function (data) {
        $('#country_name').empty();
        $('#zone_name').empty();
        $('#address_type').empty();
        $('#district_name').empty();
        $('#vdc_name').empty();
        $('#country_name').append('<option value="">[Select Country]</option>')
        $.each(data, function (index, zoneObj) {
            $('#country_name').append('<option value="'+zoneObj.id+'">'+zoneObj.country_name+'</option>')
        })
    })
})

$('#country_name').on('change',function (e) {
    console.log(e);
    var country_id = e.target.value;
    $.get('country_name?country_id=' + country_id, function (data) {
        $('#zone_name').empty();
        $('#district_name').empty();
        $('#vdc_name').empty();
        $('#zone_name').append('<option value="">[Select Zone]</option>')
        $('#address_type').append('<option value="">State OR Zone</option><option value="state">State</option><option value="zone">Zone</option>')
        $.each(data, function (index, zoneObj) {
            $('#zone_name').append('<option value="'+zoneObj.id+'">'+zoneObj.name+'</option>')
        })

    })
})


$('#zone_name').on('change',function (e) {
    console.log(e);
    var zone_id = e.target.value;
    $.get('zone_name?zone_id=' + zone_id, function (data) {
        $('#district_name').append('<option value="">[Select District]</option>')
        $('#vdc_name').empty();
        $.each(data, function (index, districtObj) {
            $('#district_name').append('<option value="'+districtObj.id+'">'+districtObj.name+'</option>')
        })
    })
})

$('#district_name').on('change',function (e) {
    console.log(e);
    var district_id = e.target.value;
    $.get('district_name?district_id=' + district_id, function (data) {
        $('#vdc_name').empty();
        $.each(data, function (index, locationObj) {
            $('#vdc_name').append('<option value="'+locationObj.name+'">'+locationObj.name+'</option>')
        })
    })
})
