<div class="form_all">
        <div class="container form_all">
            <h1>FEATURE-TABLE-FORM</h1>
            <span id="statuss" style="display:none; color:green;">Form Submit Successfully</span>
            <span id="wrongs" style="display:none; color:red;">Something Went to Wrong</span>
            <form id="FEATURE_form" method="post">
            <input type="hidden" name="actions" value="inserts"/>   
            <div class="col-md-6 form_secs">
                <label class="sections_faces">Title</label> 
                    <input type="text" id="feature_title" name="title_feature" required>
                    <span class="error_forms" id="title_feature_error_message"></span>	
            </div>
            <div class="col-md-6 form_secs">
                <label class="sections_faces">Description</label>
                    <input type="text" id="feature_description" name="description_feature" required>
                    <span class="error_forms" id="description_feature_error_message"></span>	
            </div>
                <div class="col-md-6 form_secs">
                    <button class="insert_button" type="button" value="submit" name="">INSERT</button>
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
                $result = $wpdb->get_results( "SELECT * FROM wp_feature");
                foreach ( $result as $print )   { ?>
                <tr class="tables" style="line-height: 2.0;">
                    <td class="record-sec">  <?php echo $count; ?> </td>
                    <td><?php echo $print->	feature_title; ?> </td>
                    <td> <?php echo $print->feature_description ; ?> </td>
                </tr>
                <?php $count++;?>
                    <?php }
            ?>
            </table>
        </div>