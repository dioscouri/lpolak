<div class="row">
    <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <input type="text" class="form-control number" data-required="true" name="card[number]" value="" placeholder="Card Number" autocomplete="off">
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <select class="form-control month" data-required="true" name="card[month]">
        <?php 
        for ($i=1; $i<=12; $i++) {
            $month_num = str_pad( $i, 2, 0, STR_PAD_LEFT );
            $month_name = date('F', strtotime( date('Y') . '-' . $month_num ) );
            ?>
            <option value="<?php echo $month_num; ?>"><?php echo $month_num . ' - ' . $month_name; ?></option>
        <?php } ?>
        </select>        
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-2">
        <select class="form-control year" data-required="true" name="card[year]">
        <?php for ($n=date('Y'); $n<date('Y')+25; $n++) { ?>
        	<option value="<?php echo $n; ?>"><?php echo $n; ?></option>
        <?php } ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <input type="text" class="form-control cvv" data-required="true" name="card[cvv]" value="" placeholder="Security Code" autocomplete="off">
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-8">
        <img src="./minify/Shop/Assets/images/cvv_mc_visa.gif" />
        <img src="./minify/Shop/Assets/images/cvv_amex.gif" />
    </div>
</div>

<legend><small>Billing Address</small></legend>
<?php if ($cart->shippingRequired()) { ?>
<div class="form-group">
    <div class="checkbox">
        <label>
          <input type="checkbox" id="same-as-shipping" name="checkout[billing_address][same_as_shipping]" <?php if ($cart->billingSameAsShipping()) { echo 'checked'; } ?>> Same as shipping address
        </label>
    </div>
</div>
<?php } ?>
<div class="form-group">
    <input type="text" class="form-control name" data-required="true" data-shipping="<?php echo $cart->{'checkout.shipping_address.name'}; ?>" name="checkout[billing_address][name]" value="<?php echo $cart->billingName( $cart->{'checkout.shipping_address.name'} ); ?>" placeholder="Full Name" autocomplete="name" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
</div>
<div class="form-group">
    <input type="text" class="form-control address" data-required="true" data-shipping="<?php echo $cart->{'checkout.shipping_address.line_1'}; ?>" name="checkout[billing_address][line_1]" value="<?php echo $cart->billingLine1( $cart->{'checkout.shipping_address.line_1'} ); ?>" placeholder="Address Line 1" autocomplete="address-line1" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
</div>
<div class="form-group">
    <input type="text" class="form-control address" data-shipping="<?php echo $cart->{'checkout.shipping_address.line_2'}; ?>" name="checkout[billing_address][line_2]" value="<?php echo $cart->billingLine2( $cart->{'checkout.shipping_address.line_2'} ); ?>" placeholder="Address Line 2" autocomplete="address-line2" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
</div>
<div class="form-group">
    <input type="text" class="form-control city" data-required="true" data-shipping="<?php echo $cart->{'checkout.shipping_address.city'}; ?>" name="checkout[billing_address][city]" value="<?php echo $cart->billingCity( $cart->{'checkout.shipping_address.city'} ); ?>" placeholder="City" autocomplete="locality" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
</div>
<div class="row">
    <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <select class="form-control region" data-required="true" data-shipping="<?php echo $cart->{'checkout.shipping_address.region'}; ?>" name="checkout[billing_address][region]" id="billing-region" autocomplete="region" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
        <?php foreach (\Shop\Models\Regions::byCountry( $cart->billingCountry( $cart->shippingCountry() ) ) as $region) { ?>
            <option value="<?php echo $region->code; ?>" <?php if ($cart->billingRegion( $cart->{'checkout.shipping_address.region'} ) == $region->code) { echo "selected"; } ?>><?php echo $region->name; ?></option>
        <?php } ?>
        </select>                        
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <select class="form-control country" data-required="true" data-shipping="<?php echo $cart->shippingCountry(); ?>" name="checkout[billing_address][country]" id="billing-country" autocomplete="country" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
        <?php foreach (\Shop\Models\Countries::find() as $country) { ?>
            <option value="<?php echo $country->isocode_2; ?>" <?php if ($cart->billingCountry( $cart->shippingCountry() ) == $country->isocode_2) { echo "selected"; } ?>><?php echo $country->name; ?></option>
        <?php } ?>
        </select>
    </div>            
</div>            
<div class="row">
    <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <input type="text" class="form-control postal-code" data-required="true" data-shipping="<?php echo $cart->{'checkout.shipping_address.postal_code'}; ?>" name="checkout[billing_address][postal_code]" value="<?php echo $cart->billingPostalCode( $cart->{'checkout.shipping_address.postal_code'} ); ?>" placeholder="Postal Code" autocomplete="postal-code" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-8">
        <input type="text" class="form-control phone" data-required="true" data-shipping="<?php echo $cart->{'checkout.shipping_address.phone_number'}; ?>" name="checkout[billing_address][phone_number]" value="<?php echo $cart->billingPhone( $cart->{'checkout.shipping_address.phone_number'} ); ?>" placeholder="Phone Number" autocomplete="tel" <?php if ($cart->billingSameAsShipping()) { echo 'disabled'; } ?>>
    </div>            
</div>

<script>
ShopGetBillingRegions = function(callback_function) {
    var el = jQuery('#billing-country');
    var regions = jQuery('#billing-region');
    var val = el.val();
    var request = jQuery.ajax({
        type: 'get', 
        url: './shop/address/regions/'+val
    }).done(function(data){
        var response = jQuery.parseJSON( JSON.stringify(data), false);
        if (response.result) {
            jQuery('#parents').html(response.result);
            regions.find('option').remove();
            jQuery.each(response.result, function(index,value){
                regions.append(jQuery("<option></option>").text(jQuery('<span>').html(value.name).text()).val(value.code));
            });
        }

        if ( typeof callback_function === 'function') {
            callback_function( response );
        }
    });    
}

jQuery(document).ready(function(){
    jQuery('#billing-country').on('change', function(){
        ShopGetBillingRegions();
    });
        
    <?php if ($cart->shippingRequired()) { ?>
    jQuery('#same-as-shipping').on('change', function(){
        el = jQuery('#same-as-shipping');
        isChecked = el.is(':checked');
        if (isChecked) {
            e = jQuery('#billing-country');
            if (e.length) {
                if (e.val() != e.attr('data-shipping')) {
                    e.val( e.attr('data-shipping') );
                    ShopGetBillingRegions(function(){
                        r = jQuery('#billing-region')
                        r.val( r.attr('data-shipping') );
                    });
                }                
            }
            jQuery('[data-shipping]').each(function() {
                e = jQuery(this); 
                e.val( e.attr('data-shipping') ).prop('disabled', true);
            });
        }
        else {
            jQuery('[data-shipping]').each(function() {
                jQuery(this).prop('disabled', false); 
            });            
        }
    });
    <?php } ?>

    jQuery('#checkout-payment-form').on('submit', function() {
        if (jQuery(this).data('validated')) {
            jQuery(this).find('[data-shipping]').prop('disabled', false);
        }        
    });
});
</script>