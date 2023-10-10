<?php include_once('../config/config.php');
session_start();
if ($_SESSION["taikhoan"] == NULL) { ?>
    <script>
        window.location.href = "../tai-khoan/dang-nhap.php";
    </script>
<?php } elseif ($_SESSION["nhomtk"] < 1) { ?>
    <script>
        window.location.href = "../index.php";
    </script>
    </div>
<?php } else {
    ?>

    <div style="padding-top: 55px" class="caption">
        Danh sách bài tập
    </div>

    
    <hr>
    <div class="input-group form-group">
        <input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm bài tập..">
        <button class="btn btn-primary" id="addHW" onclick="addHomework()">Thêm bài tập</button> </div> 
        </span>
    </div>
    <div class="row">
        <table class="table table-bordered table-responsive">
            <tr class="chimuc">
                <th>ID</th>
                <th>Subject</th>
                <th>Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Teacher</th>
                <th>Status</th>
            </tr>
            <tbody id="hienthidulieubaitap">
            </tbody>
        </table>
    </div>

    <!-- Start Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN BÀI TẬP</h4>
                </div>
                <div class="modal-body">
                    <div id="noidungsua"></div>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <div id="thongbaothem"></div>
                    <button type="button" id="suabaitap" class="btn btn-primary">CẬP NHẬT</button>
                </div><br>
            </div>
        </div>
    </div>
    <!-- End Modal -->


<?php } ?>
<script>
    function get_data() {
        $(document).ready(function () {
            $('a#quanlysv').addClass('chon');
            $('a#themsv').removeClass('chon');
            $('a#bangdk').removeClass('chon');
            $('a#quanlykhoa').removeClass('chon');

            $.get('xu-ly/bai-tap/du-lieu-bai-tap.php', function (data) {
                $('#hienthidulieubaitap').html(data);
            });

            $.get('xu-ly/bai-tap/du-lieu-bai-tap.php', { id: "" }, function (data) {
                $('#hienthidulieubaitap').html(data);
            });
        })
    }
    var x = setInterval(get_data, 1000);
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            clearInterval(x);

            $("#hienthidulieubaitap tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });



    $('button#addHW').click(function() {
        $('#ModalEdit').modal();
        var id = $(this).attr('addHW');

        $.ajax({
            url: 'xu-ly/bai-tap/them-bai-tap.php',
            type: 'POST',
            dataType: 'HTML',
            data: {id: id},
            success: function(data){
                $('#noidungsua').html(data);
            }
        });
        
    });
</script>
