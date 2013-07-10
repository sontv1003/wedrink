jQuery(document).ready(function(){
    jQuery( "ul.nav-menu li" ).each(function( index ) {
        jQuery(this).find('a').addClass('color_'+ index);
    });
    
    jQuery(function() {
        jQuery( "#tabs" ).tabs();
    });
    
    
    jQuery('#btorder').click(function(){
        jQuery('.wrappop').show();
        jQuery('.popupprd').show();
        jQuery('#soluong').val(jQuery('#soluong0').val());
        jQuery('#thetich').val(jQuery('#thetich0').val());
        jQuery('.thetichface').text(jQuery('#thetich0').val());
        var sl = parseFloat(jQuery('#soluong0').val());
        if(isNaN(sl)){
            sl = 0;
            jQuery('#soluong').val('0')
        }
        
        var tt = jQuery('#thetich0').val();
        var u = jQuery('#priceunit').val();
        var t=0;
        if(tt=='350ml'){
            t = parseFloat(jQuery('#price300').val());
        }else if(tt=='500ml'){
            t = parseFloat(jQuery('#price500').val());
        }else if(tt=='1L'){
            t = parseFloat(jQuery('#price1').val());
        }
        s = t*sl;
        jQuery('.thanhtien').html(s + u);
        jQuery('#thanhtien').val(s + u);
    });
    jQuery('#soluong').focusout(function(){
        var sl = jQuery(this).val();
        if(isNaN(sl)){
            sl = 0;
        }
        var tt = jQuery('#thetich0').val();
        var u = jQuery('#priceunit').val();
        var t=0;
        if(tt=='350ml'){
            t = parseFloat(jQuery('#price300').val());
        }else if(tt=='500ml'){
            t = parseFloat(jQuery('#price500').val());
        }else if(tt=='1L'){
            t = parseFloat(jQuery('#price1').val());
        }
        s = t*sl;
        jQuery('.thanhtien').html(s + u);
        jQuery('#thanhtien').val(s + u);
    });
    jQuery('.close').click(function(){
        jQuery('.wrappop').hide();
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
        if(isNaN(soluong)){
            jQuery('.message').html('Số lượng phải là số');
            e.preventDefault();
        }
    });
});