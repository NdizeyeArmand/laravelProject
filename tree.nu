#!/usr/bin/env nu

# Tree-like directory structure visualizer
# Usage: nu tree.nu [--max-depth <depth>] [--exclude-dirs <pattern>]

def tree [
    path: path = "."
    --max-depth: int = 5
    --exclude-dirs: list<string> = ["vendor" "node_modules" "storage" ".git"]
] {
    let indent_char = "│"
    let branch_char = "├──"
    let last_branch_char = "└──"

    def is_excluded [name: string, excluded: list<string>] {
        $excluded | any { |pattern| $name =~ $pattern }
    }

    # Fix 1: all parameters now have default values so no required-after-optional error
    def show_tree [
        dir: path = "."
        prefix: string = ""
        depth: int = 0
        max_depth: int = 5
        excluded: list<string> = []
    ] {
        if $depth >= $max_depth {
            return
        }

        let entries = (ls $dir | sort-by name | where name !~ '^\.')

        # Fix 2: replaced deprecated `filter` with `where` + closure variable
        let predicate = { |entry| not (is_excluded $entry.name $excluded) }
        let filtered = ($entries | where $predicate)

        let count = ($filtered | length)

        $filtered | enumerate | each { |item|
            let entry = $item.item
            let index = $item.index
            let is_last = ($index == ($count - 1))
            let current_branch = (if $is_last { $last_branch_char } else { $branch_char })
            let next_prefix = (if $is_last { "   " } else { ($indent_char + "  ") })

            print ($prefix + $current_branch + " " + $entry.name)

            if $entry.type == "dir" {
                show_tree $entry.name ($prefix + $next_prefix) ($depth + 1) $max_depth $excluded
            }
        }
    }

    print $path
    show_tree $path "" 0 $max_depth $exclude_dirs
}

tree --max-depth 6 --exclude-dirs ["vendor" "node_modules" "storage" ".git" "cache"]

