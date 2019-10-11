// https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
const el = wp.element.createElement;

const iconEl = el(
    'svg',
    {
        width: 24,
        height: 24,
        xmlns: "http://www.w3.org/2000/svg",
        viewBox: "0 0 24 24",
        role: "img",
        focusable: "false"
    },
    el(
        'path',
        {
            d: "M7 5.2a2 2 0 0 1 2 2c0 .37-.11.71-.28 1C8.72 8.2 8 8 7 8s-1.72.2-1.72.2c-.17-.29-.28-.63-.28-1a2 2 0 0 1 2-2zm6 0c1.11 0 2 .89 2 2 0 .37-.11.71-.28 1 0 0-.72-.2-1.72-.2s-1.72.2-1.72.2c-.17-.29-.28-.63-.28-1 0-1.11.89-2 2-2zm-3 13.7a8.69 8.69 0 0 0 8.23-5.88l-1.32-.46C15.9 15.52 13.12 17.5 10 17.5s-5.9-1.98-6.91-4.94l-1.32.46A8.69 8.69 0 0 0 10 18.9z",
            fill: "#ff8913",
        },
    ),
);

( function( blocks, editor, element ) {
    var RichText = editor.RichText;
 
    blocks.registerBlockType( 'comedy-festival/artists', {
        title: 'Artistes',
        icon: iconEl,
        category: 'comedy-festival',
 
        attributes: {
            content: {
                type: 'array',
                source: 'children',
                selector: 'p',
            },
        },
 
        edit: function( props ) {
            var content1 = props.attributes.content1;
            var content2 = props.attributes.content2;

            function onChangeContent( newContent ) {
                props.setAttributes( {
                    content1: newContent
                } );
            }

            function onChangeContent2( newContent ) {
                props.setAttributes( {
                    content2: newContent
                } );
            }

            return el(
                'p',
                null,
                '[LISTE DES ARTISTES]',
            );
 
            /*return el(
                'p',
                null,
                'Back [artistes]'
            );*/
        },
 
        save: function( props ) {
            return el(
                'p',
                null,
                '[artistes]',
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.editor,
    window.wp.element
) );