<?php $this->load->view('front/header'); ?>

<div class="container">
    <h3 class="pb-4 pt-4">Blog</h3>
    <div class="row">
        <div class="col-md-12">
            <h3>
                <?php echo $article['title'];?>
            </h3>
            <div class="d-flex justify-content-between">
                
            <p class="text-muted">Posted By <strong><?php echo $article['author'];?></strong> on <strong><?php echo date('d M Y',strtotime($article['created_at']));?></strong></p>
            <a href="#" class="text-muted p-2 bg-light text-uppercase"><strong><?php echo $article['category_name'];?></strong></a>   
        </div>
        
        <?php 
            if($article['image']!="" && file_exists('./public/uploads/articles/thumb_front/'.$article['image'])){
                ?>
                <img src="<?php echo base_url('/public/uploads/articles/thumb_front/'.$article['image']);?>" alt="">
                <?php
            }
        ?>
            image here
            <?php echo $article['description'];?>
            
        </div>
    </div>
</div>    

<?php $this->load->view('front/footer'); ?>