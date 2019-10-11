( function( blocks, editor, element ) {
    var RichText = editor.RichText;
 
    blocks.registerBlockType( 'comedy-festival/jury', {
        title: 'Jury',
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
                '[LISTE DES JURY]',
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
                '[jury]',
            );
        },
    } );
}(
    window.wp.blocks,
    window.wp.editor,
    window.wp.element
) );