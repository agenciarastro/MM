<?php
/*
Template Name: Contato
*/
?>

<?php get_header(); ?>
	<div id="content">
		<div class="col-left col">
			<h1 class="page-title">Fale conosco</h1>
			<p>Somos todo ouvido: Mande sua mensagem que respondemos rapidinho...
			Aproveite e venha tomar um café, mate ou cerva com a gente!</p>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
		</div>
		
		<div class="col-right col">
			<div class="contatos">
				<ul>
					<li>(21) 3988-3544</li>
					<li><a href="mailto:contato@templocoworking.com">contato@templocoworking.com</a></li>
					<li><a href="//facebook.com/temploworking" target="_blank">facebook.com/templocoworking</a></li>
					<li><a href="//instagram.com/templocoworking" target="_blank">instagram.com/templocoworking</a></li>
				</ul>
			</div>
			<?php /*
			<iframe width="425" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Duque+Estrada,+41,+Rio+de+Janeiro&amp;aq=t&amp;sll=37.0625,-95.677068&amp;sspn=60.376022,85.605469&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Duque+Estrada,+41+-+G%C3%A1vea,+Rio+de+Janeiro,+22451-090,+Rep%C3%BAblica+Federativa+do+Brasil&amp;t=m&amp;ll=-22.970169,-43.230944&amp;spn=0.047415,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe> */?>
		</div>
	</div> <!-- end #content -->
<?php get_footer(); ?>