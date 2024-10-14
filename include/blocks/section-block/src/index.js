const { registerBlockType } = wp.blocks;
const { InnerBlocks } = wp.editor;
const { Fragment } = wp.element;

registerBlockType( 'my-plugin/section-block', {
    title: 'Section Block',
    icon: 'superhero',
    category: 'layout',

    allowedBlocks: [ 'core/paragraph', 'core/image', 'core/heading' ], // określa dozwolone bloki w InnerBlocks

    template: [ // określa domyślny blok, który ma być dodawany, gdy InnerBlocks jest pusty
        [ 'core/paragraph', { placeholder: 'Wprowadź tekst...' } ]
    ],

    edit: ( props ) => {
        return (
            <Fragment>
                <>
                    <div className="sample">
                        <InnerBlocks />
                    </div>
                </>
            </Fragment>
        );
    },

    save: ( props ) => {
        return (
            <section className="bsk-single-content bg-color-white py-0 py-sm-5">
                <div className="container px-0 px-sm-3">
                    <div className="bsk-default-border px-3 px-lg-0 py-3 py-lg-5 bg-color-light-sand">
                        <div className="container--768 mx-auto">
                            <InnerBlocks.Content />
                        </div>
                    </div>
                </div>
            </section>
        );
    },
} );