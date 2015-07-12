<?php

namespace Framework;

use Framework\Exception\TemplateNotFoundException;

abstract class AbstractController
{

    /**
     * Current request object
     *
     * @var Request
     */
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Generate response content output using the passed in template
     * and data.
     *
     * @param  string   $template_filepath
     * @param  array    $data
     * @throws TemplateNotFoundException
     * @return Response
     */
    public function render($template_filepath, array $data = [])
    {
        if (!file_exists($template_filepath)) {
            throw new TemplateNotFoundException();
        }

        // Populate current buffer with $data
        extract($data);
        ob_start();
        include($template_filepath);
        $template_content = ob_get_contents();
        ob_end_clean();

        // Build a Response object
        $response = new Response();
        $response->setContent($template_content);
        return $response;
    }

}

