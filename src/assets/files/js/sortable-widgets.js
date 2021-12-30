function initSortableWidgets(gridId, url) {
  $('#' + gridId + ' tbody').sortable({
    animation: 300,
    handle: '.sortable-widget-handler',
    dataIdAttr: 'data-sortable-id',
    onEnd: function (e) {
      $.post(url, {
        sorting: this.toArray()
      });
    }
  });
}
