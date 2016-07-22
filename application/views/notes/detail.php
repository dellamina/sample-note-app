<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?=$note['title']?> - Sample Note App</title>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="<?=base_url();?>static/css/custom.css"  media="screen,projection"/>

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="<?=base_url();?>static/js/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="<?=base_url();?>static/js/materialize.min.js"></script>

    </head>
    <body>

    <div class="container">

        <div class="row">
            <div class="col l10 s12 offset-l1 main">

                <h3><i class="small material-icons">insert_comment</i> <small>edit</small> <?=$note['title']?></h3>
                
                <div class="hide-on-small-only relative">
                    <div class="fixed-action-btn horizontal desktop">
                        <a class="btn-floating btn-large red">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul>
                            <li><a href="#session" class="btn-floating modal-trigger blue"><i class="material-icons">language</i></a></li>
                            <li><a href="<?=base_url()?>notes" class="btn-floating green"><i class="material-icons">reply</i></a></li>
                            <li><a href="<?=base_url()?>logout" class="btn-floating yellow darken-2"><i class="material-icons">exit_to_app</i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="fixed-action-btn click-to-toggle horizontal hide-on-med-and-up mobile">
                    <a class="btn-floating btn-large red">
                        <i class="material-icons">menu</i>
                    </a>
                    <ul>
                        <li><a href="#session" class="btn-floating modal-trigger blue"><i class="material-icons">language</i></a></li>
                        <li><a href="<?=base_url()?>notes" class="btn-floating green"><i class="material-icons">reply</i></a></li>
                        <li><a href="<?=base_url()?>logout" class="btn-floating yellow darken-2"><i class="material-icons">exit_to_app</i></a></li>
                    </ul>
                </div>
                <div class="card">
                    <div class="card-content">
                        <?php echo form_open(); ?> 

                            <div class="input-field col m6 s12">
                                <i class="material-icons prefix">title</i>
                                <input name="title" type="text" value="<?=$note['title']?>">
                                <label for="title">Title</label>
                            </div>

                            <div class="input-field col m6 s12">
                                <i class="material-icons prefix">folder</i>
                                <input name="folder" type="text" value="<?=$note['folder']?>" list="hint">
                                <label for="folder">Folder</label>
                                <datalist id="hint">
                                <?php foreach ( $folder as $category ): ?>
                                    <option value="<?=$category['folder'];?>">
                                <?php endforeach; ?>
                                </datalist>
                            </div>

                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea name="text" class="materialize-textarea"><?=$note['text']?></textarea>
                                <label for="text">Text</label>
                            </div>

                            <button class="btn waves-effect waves-light blue" type="submit" name="action">Update
                                <i class="material-icons right">send</i>
                            </button>

                            <a href="#delete" class="btn red waves-effect waves-light right modal-trigger hide-on-small-only">Delete
                                <i class="material-icons right">delete_forever</i>
                            </a>
                            <a href="#delete" class="btn red waves-effect waves-light right modal-trigger hide-on-med-and-up">
                                <i class="material-icons">delete_forever</i>
                            </a>

                            <?php echo validation_errors('<p class="small">', '</p>'); ?>

                        </form>
                    </div>
                </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds costing you <strong>{memory_usage}</strong>. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

            </div>
        </div>

    </div>

    <div id="delete" class="modal small">
        <div class="modal-content">
            <h4>Confirm</h4>
            <p>Are you sure?</p>
        </div>
        <div class="modal-footer">
            <a href="<?=base_url();?>note/delete/<?=$note['id']?>" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <div id="session" class="modal bottom-sheet">
         <div class="container">
            <div class="modal-content">
                <h4>Session</h4>
                <pre>
                    <?php print_r ($this->session->all_userdata()); ?>
                </pre>
            </div>
        </div>
    </div>

    <script>

    <?php if ( $this->session->flashdata('messanger') ){ ?>
    setTimeout(function() { Materialize.toast('<?=$this->session->flashdata('messanger');?>', 2500) } , 400 )
    <?php } ?>

    $(document).ready(function(){
        $('.modal-trigger').leanModal();
    });

    </script>

    </body>
</html>