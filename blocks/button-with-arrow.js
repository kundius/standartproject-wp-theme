( function( blocks, element ) {

  const el = element.createElement;

  //const { RichText } = editor;
  const { registerBlockType } = blocks;

  registerBlockType('form/button-with-arrow', {
    title: 'Кнопка со стрелкой',
    icon: 'button',
    category: 'widgets',
    keywords: ['button'],

    attributes: {
      content: {
        type: 'string'
      },
      href: {
        type: 'string'
      }
    },

    edit: function (props) {
      const { attributes: { content, href }, setAttributes } = props;
      return el(
        'div',
        {
          className: props.className
        },
        [
          el(
            'input',
            {
              value: content,
              placeholder: 'Содержимое',
              onChange (e) {
                setAttributes({ content: e.target.value })
              }
            }
          ),
          el(
            'input',
            {
              value: href,
              placeholder: 'Ссылка',
              onChange (e) {
                setAttributes({ href: e.target.value })
              }
            }
          )
        ]
      );
    },

    save: function (props) {
      return el(
        'p',
        {
          className: props.className
        },
        el(
          'a',
          {
            className: 'ui-button-more-alt',
            href: props.attributes.href
          },
          [
            props.attributes.content,
            el(
              'span',
              {
                className: 'ui-button-more-alt__arrow'
              }
            )
          ]
        )
      );
    }
  });
})(
  window.wp.blocks,
  window.wp.element
);
