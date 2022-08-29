const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls, ColorPalette, BlockControls, AlignmentToolbar } = wp.editor; //paso 1
const { PanelBody } = wp.components;

//Logo para el bloque
import { ReactComponent as Logo  } from "../pet.svg";

/*  7 PASOS PARA CREAR UN BLOQUE EN GUTENBERG
    1. Importar el componente(s) que utilizarás
    2. Coloca el componente donde deseas utilizarlo
    3. Crea una función que lea los contenidos
    4. Registra un atributo
    5. Extraer el contenido desde props
    6. Guarda el contenido con setAttributes
    7. Lee los contenidos guardados en save()
*/

registerBlockType('cocojoy/boxes', {
    title: 'Cocojoy Cajas',
    icon: {src: Logo},
    category: 'cocojoy',
    attributes: {
        headingBox:{                 //Paso 4
            type:'string',
            source: 'html',
            selector: '.box h2'
        },
        textoBox:{                 //Paso 4
            type:'string',
            source: 'html',
            selector: '.box p'
        },
        colorFondo:{
            type:'string'
        },
        colorTexto:{
            type:'string'
        },
        alineacionContenido: {
            type: 'string',
            default: 'center'
        }
    },
    edit: (props)=>{
        console.log(props);

        //Paso 5
        const {attributes: {headingBox, textoBox, colorFondo, colorTexto, alineacionContenido}, 
        setAttributes} = props;
        // console.log(headingBox);

        const onChangeHeadingBox = (nuevoHeading) => {
            // console.log(nuevoHeading);
            //Paso 6
            setAttributes({headingBox: nuevoHeading})
        }
        const onChangeTextoBox = nuevoTexto =>{
            setAttributes({textoBox: nuevoTexto})
        }
        const onChangeColorFondo = nuevoColorFondo =>{
            setAttributes({colorFondo: nuevoColorFondo})
        }
        const onChangeColorTexto = nuevoColorTexto =>{
            setAttributes({colorTexto: nuevoColorTexto})
        }
        const onChangeAlinearContenido = nuevaAlineacion =>{
            setAttributes({alineacionContenido: nuevaAlineacion})
        }

        return(
            <>
                <InspectorControls>
                    <PanelBody
                        title={'Color de Fondo'}
                        initialOpen={true}>
                        
                        <div className="components-base-control">
                            <div className="components-base-control__field">
                                <label className="components-base-control__label">
                                    Color de Fondo
                                </label>
                                <ColorPalette
                                    onChange={onChangeColorFondo}
                                    value={colorFondo}/>
                            </div>
                        </div>
                    </PanelBody>

                    <PanelBody
                        title={'Color de Texto'}
                        initialOpen={false}>
                        
                        <div className="components-base-control text-center">
                            <div className="components-base-control__field">
                                <label className="components-base-control__label">
                                    Color de Texto
                                </label>
                                <ColorPalette
                                    onChange={onChangeColorTexto}
                                    value={colorTexto}/>
                            </div>
                        </div>
                    </PanelBody>
                </InspectorControls>

                <BlockControls>
                    <AlignmentToolbar onChange={onChangeAlinearContenido}/>  
                </BlockControls>

                <div className="box" style={{ backgroundColor: colorFondo, textAlign: alineacionContenido }}>
                    <h2 style={{color: colorTexto}}>
                        <RichText
                            placeholder="Agrega el Encabezado" //Paso 2
                            onChange={onChangeHeadingBox}
                            value={headingBox} //Paso 3
                        />
                    </h2>
                    <p style={{color: colorTexto}}>
                        <RichText
                            placeholder="Agrega el Texto" 
                            onChange={onChangeTextoBox}
                            value={textoBox}
                        />
                    </p>
                </div> 
           </>
        )
    },

    //PASO 7
    save: (props)=>{ 
        const {attributes: {headingBox, textoBox, colorFondo, colorTexto, alineacionContenido}} = props;
        return(
            <div className="box" style={{ backgroundColor: colorFondo, textAlign: alineacionContenido }}>
                <h2 style={{color: colorTexto}}>
                    <RichText.Content value={headingBox}/>
                </h2>
                <p style={{color: colorTexto}}>
                    <RichText.Content value={textoBox}/>
                </p>
           </div>           
        )
    }
});