function show_events() {
	$args = array(
	'meta_key' => 'data_do_evento',  //Get the ACF value
    'orderby' => 'meta_value',  // enter the value
    'order' => 'ASC',
    'posts_per_page' => 50,
    'returns' => 'ids'
	);
	$products = wc_get_products( $args );
	foreach($products as $product)
	{
		$url = get_permalink($product->id);
		$id = $product->get_id();
		$nome = $product->name;
		$quantidade = $product->get_stock_quantity();
		$data = get_field('data_do_evento', $product->id);
		$tipo = get_field('tipo_de_evento', $product->id);
?>

<a href="/carrinho/?add-to-cart=<?= $id; ?>">

	<div data-animate="fadeInUp" class="box-cinza col medium-4 small-12 large-4">
	<div class="col-inner">

<div class="data"><h2> <?= $data; ?></h2> </div>

<div class="tipo-evento"><p> <?= $tipo; ?></p> </div>

<div class="nome-evento"><h3> <?= $nome; ?></h3> </div>

<div class="Ingressos">
	<div class="disponivel">
		<p>
	Ingressos Disponíveis
	</p>
	</div>
	<div class="quantidade_disponivel">
	<p>(<?= $quantidade; ?>) </p></div>
		</div>

</div>
</div>
</a>	
	
	

<?php	
	}

}

add_shortcode('show_events', 'show_events');
