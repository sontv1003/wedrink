jQuery(document).ready(function(){
    jQuery( "ul.nav-menu li" ).each(function( index ) {
        jQuery(this).find('a').addClass('color_'+ index);
    });
    
    jQuery(function() {
        jQuery( "#tabs" ).tabs();
    });
    
    
    jQuery('#btorder').click(function(){
        jQuery('.popupprd').show();
        jQuery('#soluong').val(jQuery('#soluong0').val());
        jQuery('#thetich').val(jQuery('#thetich0').val());
    });
    jQuery('.close').click(function(){
        jQuery('.popupprd').hide();
    });
    jQuery('#ordersubmit').click(function(e){
        var sanpham = jQuery('#sanpham').val();
        var soluong = jQuery('#soluong').val();
        var thetich = jQuery('#thetich').val();
        var hoten = jQuery('#hoten').val();
        var dienthoai = jQuery('#dienthoai').val();
        var diachi = jQuery('#diachi').val();
        if(sanpham=='' || soluong=='' || thetich=='' || hoten=='' || dienthoai=='' || diachi==''){
            jQuery('.message').html('BẠN CHƯA NHẬP ĐỦ THÔNG TIN');
            e.preventDefault();
        }
    });
});