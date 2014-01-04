<div class="headerbar">
    <h1>Tin tức</h1>

    <div class="pull-right">
        <a class="btn btn-primary" href="<?php echo site_url('news/create'); ?>"><i class="icon-plus icon-white"></i> Đăng tin mới</a>
    </div>

</div>

<div class="table-content">

    <?php echo $this->load->view('layouts/admin/alerts'); ?>

    <table class="table table-striped">

        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Ngày đăng tin</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($news as $article) { ?>
                <tr>
                    <td>
                        <?php if ($article->file_id > 0 && isset($file_arr[$article->file_id])) : ?>
                            <img src="/uploads/news/<?php echo $file_arr[$article->file_id]; ?>" style="width: 150px; height: 100px;"/>
                        <?php else : ?>
                            <img src="/assets/images/noimage.png" style="width: 150px; height: 100px;"/>
                        <?php endif; ?>
                        &nbsp;
                        <?php echo $article->title; ?>
                    </td>
                    <td><?php echo get_vndate_string($article->created_at); ?></td>
                    <td>
                        <div class="options btn-group">
                            <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog"></i> <?php echo lang('options'); ?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="fancy-iframe" href="<?php echo site_url('news/detail/' . $article->id); ?>">
                                        <i class="icon-fullscreen"></i> Xem chi tiết
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('news/edit/' . $article->id); ?>">
                                        <i class="icon-pencil"></i> Sửa thông tin
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('news/delete/' . $article->id); ?>" onclick="return confirm('Chắc chắn xóa tin này?');">
                                        <i class="icon-trash"></i> Xóa
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>