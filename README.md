# ssrigging-sitesubmenus

##Requirements
* Silverstripe 3.0
* **cms** module

##Installation
* Simply drop into silverstripe root (using whatever method)
* `dev/build`

##Usage
Automatically applies itself to SiteConfig. Simply create some sub-menu references and then display them in the template using something like:
```
<% loop $SiteConfig.SubMenus %>
	<div class="footer-submenu">
		<h2><span>$Icon.SetRatioSize(50,50)</span> $Base.MenuTitle</h2>
		<ul>
			<% if ShowAll %>
				<% loop $Base.AllChildren %>
					<li class="$LinkingMode"><a href="$Link">$Title</a></li>
				<% end_loop %>
			<% else %>
				<% loop $Base.Children %>
					<li class="$LinkingMode"><a href="$Link">$Title</a></li>
				<% end_loop %>
			<% end_if %>
		</ul>
	</div>
<% end_loop %>
```

##About
The idea is for the use-case of something like wanting to list the Services (or Products, etc) menu out in the footer, and the structure is already defined in the SiteTree.

##Notes
- **GridFieldSortableRows** automatically applies if present.
- If the children of the selected page are hidden from the menu, use the 'ShowAll' option and a similar template to the example above to be able to list them out.