const $visitCheckboxSelector = $('#visitsearch-showuseripnotes');

document.addEventListener('DOMContentLoaded', () => {
    $('#visit-search-container').on('beforeSubmit', ({target}) => {
        console.log('test');
        // const params = new URLSearchParams(window.location.search);
        // params.set(visitCheckboxField, );
        // window.location.search = unescape(params.toString()); // showUserIpNotes
        // $(target).yiiActiveForm('updateAttribute', 'showUserIpNotes', 1);
        // $(target).data.add(visitCheckboxField, );
    });
});
