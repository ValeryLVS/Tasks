function glob_tree_files($path, $_base_path = null)
        {
            if (is_null($_base_path)) {
                $_base_path = '';
            } else {
                $_base_path .= basename($path) . '/';
            }

            $out = array();
            foreach(glob($path . '/*') as $file) {
                if (is_dir($file)) {
                    $out = array_merge($out, glob_tree_files($file, $_base_path));
                } else {
                    $out[] = $_base_path . basename($file);
                }
            }

            return $out;
        }


////////////////////////////////////////////////////////////////////
        $dir = 'C:\OpenServer\OpenServer\domains\AutoService\controllers';
        $files = glob_tree_files($dir);

        foreach ($files as $file) {
            $findme   = '/';
            $pos = strpos($file, $findme);
            $file = substr($file, $pos);
            $file = str_replace('/', '', $file);
            var_dump($file);
        }

        public static function loadClass($className) {
        $path = 'C:\OpenServer\OpenServer\domains\AutoService';
        $dir  = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::SELF_FIRST);
        $arr = [];
        foreach ($files as $file) {
            $arr[] .= $file;
        }

        foreach ($arr as $file) {
            $pos = strrpos ($file, '\\');
            $segments = explode('\\', $className);
            $segments = array_pop ($segments);
            $segments = '\\' . $segments;
            $string = substr($file, 0, $pos);
            $fil = $string . $segments . '.php';

            if (file_exists($fil)) {
                include_once $fil;
            }
        }
    }