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
                        <div class="card-header nav-bar">
                            <form action="?cmd=addNews" method="post" style="width:100%;">
                                <div class="row">
                                  <div class="col-md-12">
                                       <h4>Խմբագրել բաժինները</h4>                                      
                                  </div>
                                    <div class="col-md-4">
                                        <input type="text" name="title_am" placeholder="Վերնագիր AM" class="form-control" required>
                                            <i class="form-group__bar"></i>
                                        </div>
                                    <div class="col-md-4"> 
                                        <input type="text" name="title_en" placeholder="Վերնագիր EN" class="form-control" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                       <div class="col-md-4">
                                        <input type="text" name="title_ru" placeholder="Վերնագիր RU" class="form-control" required>
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <!--   
                                        <div class="col-md-4"> 
                                            <textarea class="form-control" name="descr_am" placeholder="Նկարագրություն AM" style="min-height:180px"></textarea>
                                            <i class="form-group__bar"></i>
                                        </div>
                                        <div class="col-md-4"> 
                                             <textarea class="form-control " name="descr_en" placeholder="Նկարագրություն EN" style="min-height:180px"></textarea>  
                                             <i class="form-group__bar"></i>
                                        </div>          
                                        <div class="col-md-4">   
                                             <textarea class="form-control " name="descr_ru" placeholder="Նկարագրություն RU" style="min-height:180px"></textarea>
                                             <i class="form-group__bar"></i>
                                           </div>   
                                           ---->
                                    <div class="col-md-12"><br>
                                         <div class="col-md-3" style="float:right">
                                            <button type="submit"class="btn btn-secondary btn-block">Ավելացնել</button>
                                        </div>
                                    </div>       
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card">
                      <div class="col-md-12">
                      <br>
                       <h4>Նորություններ</h4>                          
                      </div>
                        <?php foreach($cnt->getNews() as $news) {?>
                        <div class="card-block" style="padding: 1.4rem 2.1rem 0;">
                        
                            <div style="font-size:16px;position:absolute;right:15px;top:15px;">
                                <i class="zmdi zmdi-delete actions__item" onClick="removenews(<?php echo $news['id']?>)"></i>
                            </div>
                       
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="news, title_am, id, <?php echo $news['id']?>" value="<?php echo $news['title_am']?>" placeholder="Անվանում АМ">
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="news, title_en, id, <?php echo $news['id']?>" value="<?php echo $news['title_en']?>" placeholder="Անվանում EN">
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control live" data-live="news, title_ru, id, <?php echo $news['id']?>" value="<?php echo $news['title_ru']?>" placeholder="Անվանում RU">
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <textarea class="form-control live" data-live="news, descr_am, id, <?php echo $news['id']?>" placeholder="Նկարագրություն AM" style="min-height:150px"><?php echo $news['descr_am']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control live" data-live="news, descr_en, id, <?php echo $news['id']?>" placeholder="Նկարագրություն EN" style="min-height:150px"><?php echo $news['descr_en']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                                 <div class="col-md-4">
                                    <textarea class="form-control live" data-live="news, descr_ru, id, <?php echo $news['id']?>" placeholder="Նկարագրություն RU" style="min-height:150px"><?php echo $news['descr_ru']?></textarea>
                                    <i class="form-group__bar"></i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $group = 'news';?>
                                    <?php $parent = $news['id'];?>
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