$(function(){
    var modalConfirm = $('#confirmModal');
    var alertModal = $('#alertModal');

    modalConfirm.on('hidden.bs.modal', function() {
        $(this).find("h4").html('');
        $(this).find("p").html('');
        $(this).off('click', '#btnProceed');
    });

    alertModal.on('hidden.bs.modal', function() {
        $(this).find("h4").html('');
        $(this).find("p").html('');
    });
});

var popConfirm = (header, message) =>{
    let defer = $.Deferred();
    let modalConfirm = $('#confirmModal');

    modalConfirm.find('h4').html(header);
    modalConfirm.find('p').html(message);

    modalConfirm.modal({backdrop: 'static', keyboard: false})
        .one('click', '#btnProceed', ()=>{defer.resolve(true);})
        .one('click', '#btnCancel', ()=>{defer.resolve(false);});

    return defer.promise();
};

var popAlert = (header, message) => {
    let alertModal = $('#alertModal');

    alertModal.modal({backdrop: 'static', keyboard: false})
    alertModal.find('h4').html(header);
    alertModal.find('p').html(message);
};