	$('.add').click(function(){
		var $this = $(this);
		$this.toggleClass('.add2');
		if($this.hasClass('.add')){
			$this.text('Add to Cart');			
		} else {
			$this.text('Added to Cart');
		}
	});