const $visitCheckboxSelector = $('#visitsearch-showuseripnotes');

document.addEventListener('DOMContentLoaded', () => {
    $('#show-user-ip-form').on('afterValidate', () => {
        $.pjax.reload({container:"#visit-search-container"});
    });
});
