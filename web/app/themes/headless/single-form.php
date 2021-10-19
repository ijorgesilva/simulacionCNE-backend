<?php get_header(); ?>


<div id="main-content">
	<div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
                <div class="et_post_meta_wrapper">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<script type="text/javascript">

    sessionStorage.setItem("favoriteMovie", "Shrek");

	var paramClass = getParameterByName('classname');
	var elementClass = document.getElementsByClassName("gform_wrapper");
    var elementClassConfirmation = document.getElementsByClassName("gform_confirmation_wrapper");

    var paramClassSession = sessionStorage.getItem('classname');
    
    if( elementClassConfirmation.length > 0 ){
        // console.log('Session storage retrieved: ' + paramClassSession);
        elementClassConfirmation.classList ? elementClassConfirmation[0].classList.add(paramClassSession+'_wrapper') : elementClassConfirmation[0].className += ' '+ paramClassSession+'_wrapper';
        elementClassConfirmation[0].childNodes[0].classList ? elementClassConfirmation[0].childNodes[0].classList.add(paramClassSession) : elementClassConfirmation[0].childNodes[0].className += ' ' + paramClassSession;
    }
    

    if( paramClass != undefined ){
        //console.log(elementClass[0].classList);
    	elementClass.classList ? elementClass[0].classList.add(paramClass+'_wrapper') : elementClass[0].className += ' '+ paramClass+'_wrapper';
        elementClass[0].childNodes[0].classList ? elementClass[0].childNodes[0].classList.add(paramClass) : elementClass[0].childNodes[0].className += ' ' + paramClass;
        sessionStorage.setItem("classname", paramClass);
        var classNameSessionName = sessionStorage.getItem('classname');
        // console.log('Session storage saved: ' + classNameSessionName);
    }

</script>

<?php get_footer();
