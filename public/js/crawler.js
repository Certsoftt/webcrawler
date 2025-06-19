// JS for webcrawler admin UI (AJAX, modals, etc.)
// AJAX for managing sources
$(document).ready(function() {
    function loadSources() {
        $.get('/api/webcrawler/sources', function(data) {
            var tbody = $('#sources-table tbody');
            tbody.empty();
            data.forEach(function(source) {
                tbody.append('<tr data-id="'+source.id+'">'+
                    '<td>'+source.name+'</td>'+
                    '<td>'+source.url+'</td>'+
                    '<td>'+source.type+'</td>'+
                    '<td>'+(source.active ? 'Yes' : 'No')+'</td>'+
                    '<td>'+
                        '<button class="btn btn-sm btn-primary edit-source">Edit</button> ' +
                        '<button class="btn btn-sm btn-danger delete-source">Delete</button>'+
                    '</td>'+
                '</tr>');
            });
        });
    }
    loadSources();
    $('#add-source-btn').click(function() {
        $('#sourceModal .modal-title').text('Add Source');
        $('#sourceModal .modal-body').html('<form id="source-form">'+
            '<input type="text" name="name" placeholder="Name" class="form-control" required><br>'+
            '<input type="url" name="url" placeholder="URL" class="form-control" required><br>'+
            '<input type="text" name="type" placeholder="Type (html/rss/social)" class="form-control" required><br>'+
            '<label><input type="checkbox" name="active" checked> Active</label><br>'+
            '<button type="submit" class="btn btn-success">Save</button>'+
        '</form>');
        $('#sourceModal').modal('show');
    });
    $(document).on('submit', '#source-form', function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post('/api/webcrawler/sources', data, function() {
            $('#sourceModal').modal('hide');
            loadSources();
        });
    });
    $(document).on('click', '.edit-source', function() {
        var row = $(this).closest('tr');
        var id = row.data('id');
        var name = row.find('td:eq(0)').text();
        var url = row.find('td:eq(1)').text();
        var type = row.find('td:eq(2)').text();
        var active = row.find('td:eq(3)').text() === 'Yes';
        $('#sourceModal .modal-title').text('Edit Source');
        $('#sourceModal .modal-body').html('<form id="source-edit-form">'+
            '<input type="text" name="name" value="'+name+'" class="form-control" required><br>'+
            '<input type="url" name="url" value="'+url+'" class="form-control" required><br>'+
            '<input type="text" name="type" value="'+type+'" class="form-control" required><br>'+
            '<label><input type="checkbox" name="active"'+(active?' checked':'')+'> Active</label><br>'+
            '<button type="submit" class="btn btn-primary">Update</button>'+
        '</form>');
        $('#sourceModal').modal('show');
        $(document).off('submit', '#source-edit-form').on('submit', '#source-edit-form', function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '/api/webcrawler/sources/' + id,
                method: 'PUT',
                data: data,
                success: function() {
                    $('#sourceModal').modal('hide');
                    loadSources();
                }
            });
        });
    });
    $(document).on('click', '.delete-source', function() {
        if (!confirm('Are you sure?')) return;
        var id = $(this).closest('tr').data('id');
        $.ajax({
            url: '/api/webcrawler/sources/' + id,
            method: 'DELETE',
            success: function() {
                loadSources();
            }
        });
    });
});
