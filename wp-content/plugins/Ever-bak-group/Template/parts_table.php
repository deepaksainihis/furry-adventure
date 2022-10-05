<div class="form_all">
        <div class="container form_all">
            <h1>PARTS-TABLE-FORM</h1>
            <span id="correct" style="display:none; color:green;">Form Submit Successfully</span>
            <span id="incorrect" style="display:none; color:red;">Something Went to Wrong</span>
            <form id="parts_form" method="post">
            <input type="hidden" name="action" value="insert"/>   
            <div class="col-md-6 form_sec">
                <label class="sections_face">Title</label>
                    <input type="text" id="parts_title" name="parts_title" required>
                    <span class="error_form" id="title_parts_error_message"></span>	
            </div>
            <div class="col-md-6 form_sec">
                <label class="sections_face">Description</label>
                    <input type="text" id="parts_description" name="parts_description" required>
                    <span class="error_form" id="description_parts_error_message"></span>	
            </div>
            <div class="col-md-6 form_sec">
                <label class="sections_face">Image</label>
                <input type="file" id="parts_img" name="parts_img">
                    <span class="error_form" id="image_parts_error_message"></span>	
            </div>
                <div class="col-md-6 form_sec">
                    <button class="click_button" type="button" value="submit" name="">INSERT</button>
                </div>
            </form>
    </div>
</div>

<div class="container">
            <table border="1" style="width: 100%; margin-top: 40px;">
                <tr class="tables" style="line-height: 2.0;">
                    <th scope="col">#</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">DESCRIPTION</th>
                </tr>
                <div class="container del_sec_popup">
                <span id="pass" style="display:none; width: 31%; color:#67d967; text-align: center;  padding: 75px; font-size: 30px; position: absolute; left: 33%; background-color: rgb(96 93 93 / 90%);">Record Deleted Successfully</span>
                <span id="exit" style="display:none; width: 31%; color:red; text-align: center;  padding: 75px; font-size: 30px; position: absolute; left: 33%; background-color: rgb(96 93 93 / 90%);">Something Went to Wrong</span>
                </div>
            <?php
                global $wpdb;
                $count = 1;
                $result = $wpdb->get_results( "SELECT * FROM wp_parts");
                foreach ( $result as $print )   { ?>
                <tr class="tables" style="line-height: 2.0;">
                    <td class="record-sec">  <?php echo $count; ?> </td>
                    <td><?php echo $print->	title_parts; ?> </td>
                    <td> <?php echo $print->description_parts ; ?> </td>
                </tr>
                <?php $count++;?>
                    <?php }
            ?>
            </table>
        </div>