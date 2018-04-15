<!DOCTYPE html>
<html>
    <head>
        <?php require "inc/head.php";?>
    </head>

    <body data-ma-theme="indigo">
        <main class="main">
            <?php require "inc/header.php"?>
            
            <?php require "inc/aside.php"?>

            <section class="content">
                <div class="content__inner content__inner--sm" style="max-width:1100px;">  
                    <div class="card">
                      <div class="col-md-12">
                      <br>
                       <h4>Բաժինների խմբագրում</h4>                          
                      </div>
                        <?php foreach($cnt->getPages() as $page) {?>
                        <div class="card-block" style="padding: 1.4rem 2.1rem 0;">
                        
                            <div style="font-size:16px;position:absolute;right:15px;top:15px;">
                                <i class="zmdi zmdi-delete actions__item" onClick="removepage(<?php echo $page['id']?>)"></i>
                            </div>
                       
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="page, title_am, id, <?php echo $page['id']?>" value="<?php echo $page['title_am']?>" placeholder="Անվանում АМ">
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="page, title_en, id, <?php echo $page['id']?>" value="<?php echo $page['title_en']?>" placeholder="Անվանում EN">
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="page, title_ru, id, <?php echo $page['id']?>" value="<?php echo $page['title_ru']?>" placeholder="Անվանում RU">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea class="form-control live" data-live="page, descr_am, id, <?php echo $page['id']?>" placeholder="Նկարագրություն AM" style="min-height:150px"><?php echo $page['descr_am']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control live" data-live="page, descr_en, id, <?php echo $page['id']?>" placeholder="Նկարագրություն EN" style="min-height:150px"><?php echo $page['descr_en']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                                 <div class="col-md-4">
                                    <textarea class="form-control live" data-live="page, descr_ru, id, <?php echo $page['id']?>" placeholder="Նկարագրություն RU" style="min-height:150px"><?php echo $page['descr_ru']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $group = 'page';?>
                                    <?php $parent = $page['id'];?>
                                    <?php $multiple = false;?>
                                    <?php $photos = $cnt->getPhoto($group, $parent);?>
                                    <div class="p-3"></div>
                                    <button class="btn btn-info photo-btn">
                                        <i class="fa fa-cloud-upload fa-2x"></i>
                                        <input type="file" onChange="addPhoto('<?php echo $group?>', '<?php echo $parent?>', this, '<?php echo $group?>'<?php if($multiple===false){?>, 'change'<?php }?>)" style="opacity:0;position:absolute;top:0;left:0;width:100%;height:100%;" <?php if($multiple===true){?>multiple<?php }?>> 
                                    </button>
                                    <?php foreach($photos as $photo){?>
                                    <div class="photo-box">
                                        <span onClick="removePhoto('<?php echo $group?>', <?php echo $photo['photoID']?>)">x</span>
                                        <img src="/public/gallery/<?php echo $group?>/small/<?php echo $photo['photoID']?>.jpg">
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <br>    
                        <?php }?>
                        <div class="p-3"></div>
                    </div>
                    
                    
                </div>
                
                <?php require "inc/footer.php"?>
                    
            </section>
        </main>
 
    </body>
</html>