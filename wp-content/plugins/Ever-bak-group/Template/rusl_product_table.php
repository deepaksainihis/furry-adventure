<div class="form_all">
        <div class="container form_all">
            <h1>RUSL-PRODUCT-TABLE</h1>
            <span id="status" style="display:none; color:green;">Form Submit Successfully</span>
            <span id="wrong" style="display:none; color:red;">Something Went to Wrong</span>
            <form id="RUSL_form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="insert"/>   
            <div class="col-md-6 form_sec">
                <label class="sections_face">Title</label>
                    <input type="text" id="form_title" name="title" required>
                    <span class="error_form" id="title_error_message"></span>	
            </div>
            <div class="col-md-6 form_sec">
                <label class="sections_face">Description</label>
                    <input type="text" id="form_description" name="description" required>
                    <span class="error_form" id="description_error_message"></span>	
            </div>
            <div class="col-md-6 form_sec">
                <label class="sections_face">Image</label>
                <input type="file" id="form_img" name="image">
                    <span class="error_form" id="image_error_message"></span>	
            </div>
                <div class="col-md-6 form_sec">
                    <input class="ins_button" type="submit" value="submit" name="submit">               </div>
            </form>
    </div>
</div>




<div class="container">
            <table border="1" style="width: 100%; margin-top: 40px;">
                <tr class="tables" style="line-height: 2.0;">
                    <th scope="col">#</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">IMAGE</th>
                </tr>
                <div class="container del_sec_popup">
                <span id="pass" style="display:none; width: 31%; color:#67d967; text-align: center;  padding: 75px; font-size: 30px; position: absolute; left: 33%; background-color: rgb(96 93 93 / 90%);">Record Deleted Successfully</span>
                <span id="exit" style="display:none; width: 31%; color:red; text-align: center;  padding: 75px; font-size: 30px; position: absolute; left: 33%; background-color: rgb(96 93 93 / 90%);">Something Went to Wrong</span>
                </div>
            <?php
                global $wpdb;
                $count = 1;
                $result = $wpdb->get_results( "SELECT * FROM wp_mypluginruslandwk");
                foreach ( $result as $print )   { ?>
                <tr class="tables" style="line-height: 2.0;">
                    <td class="record-sec">  <?php echo $count; ?> </td>
                    <td><?php echo $print->title_main; ?> </td>
                    <td> <?php echo $print->description_main ; ?> </td>
                    <td><?php echo $print->image_main; ?> </td>
                </tr>
                <?php $count++;?>
                    <?php }
            ?>
            </table>
        </div>