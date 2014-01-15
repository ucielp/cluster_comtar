<div id="bysequence">


<form action= <?php echo BASE_URL_CLUSTER. "bysequence/success";?> method="POST"> 


<div id="myform">
    <h1><?php echo $title;?></h1>
    <h2><?php echo $subtitle;?></h2>
</div>
<h1>Name</h1>
    <p>    <input name="name"  type="text" data-validation="length" data-validation-length="min3"   </p>
    
<h1>E-mail</h1>
    <p>     <input name="email"  type="text" data-validation="email">     </p>
    
<h1>Country</h1>
    <p>     <input name="user_country" data-validation="country" >    </p>
    
<h1>18nt miRNA sequence (position 2-19) <a href='#'class="tooltip">[?]<span><img class="callout" src= "<?php echo site_url();?>/css/callout.gif" />
			<strong>18 nt<br/></strong>As miRNA sequences can vary in different species, specially positions 1, 20 and 21, we used sequences 2-19 (18 nt) for the search.</span></a>
    <p>    <input name="sequence"  type="sequence" data-validation="rna_validation">   </p>
  
    <p>    <input type="submit">    </p>
    

  
</form>
 
<script>

$.formUtils.addValidator({
  name : 'rna_validation',
  validatorFunction : function(value) {
    $val = value.length
    return value.match(/^[CAGUTcagut]+$/i) && value.length == 18;
  },
  
  errorMessage : 'You have to give a 18nt miRNA sequence length',
  errorMessageKey: 'badRNAsequence'
});

$.validate({
  modules : 'location',
  onModulesLoaded : function() {
    $('input[name="user_country"]').suggestCountry();
  }
  
});
</script>

</div>
</div> <!--End of header_container-->
