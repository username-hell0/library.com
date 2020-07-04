const storage = {
    page: '1',
    search: '',
    status: 'all',
    typeSorting: 'asc',
    columnSorting: 'id',
    iconDown: 'fa fa-caret-down',
    iconUp: 'fa fa-caret-up',
};

function fetchData() {
    const {page, search, status, typeSorting, columnSorting} = storage;
    $.ajax({
        type: 'get',
        url: "/search/user?page=" + page +
            "&column=" + columnSorting + "&type=" + typeSorting +
            "&search=" + search + "&status=" + status,
        success: function (data) {
            $('#table-users').html(data);
        },
    })
}

function clearIcon() {
    const {iconDown, iconUp, columnSorting} = storage;
    const columnId = '#column_' + columnSorting;
    const iconsString = iconDown + ' ' + iconUp;

    $(columnId).removeClass(iconsString);
}

$(document).on('click', '.sorting', function () {
    clearIcon();
    storage.typeSorting = $(this).data('type');
    storage.columnSorting = $(this).data('column');

    const {iconDown, iconUp, typeSorting, columnSorting} = storage;
    const columnId = '#column_' + columnSorting;

    if (typeSorting === 'asc') {
        $(this).data('type', 'desc');
        $(columnId).addClass(iconDown);
    } else {
        $(this).data('type', 'asc');
        $(columnId).addClass(iconUp);
    }

    fetchData();
});

$('.status').change(function () {
    storage.status = $("#status option:selected").text().toLowerCase();
    storage.page = 1;
    fetchData();
});

$(document).on('keyup', '#search', function () {
    storage.search = $('#search').val();
    storage.page = 1;
    fetchData();
});

$(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    storage.page = $(this).attr('href').split('page=')[1];
    fetchData();
});
